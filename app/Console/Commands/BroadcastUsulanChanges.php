<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UsulanPemindahtanganan;
use App\Events\UsulanPemindahtangananUpdated;

class BroadcastUsulanChanges extends Command
{
    protected $signature = 'broadcast:usulan';
    protected $description = 'perubahan data usulan pemindahtanganan';

    public function handle()
    {

        $this->newLine();

        $lastCount = 0;
        $lastHash = null;

        while (true) {
            try {

                $data = UsulanPemindahtanganan::orderBy('updated_at', 'desc')->get();
                $currentCount = $data->count();
                $currentHash = md5($data->toJson());

                $timestamp = now()->format('H:i:s');


                if ($lastHash === null) {
                    $lastHash = $currentHash;
                    $lastCount = $currentCount;
                    $this->newLine();


                    broadcast(new UsulanPemindahtangananUpdated($data));
                    $this->newLine();
                }

                if ($currentHash !== $lastHash || $currentCount !== $lastCount) {

                    broadcast(new UsulanPemindahtangananUpdated($data));

                    $this->line("   Records: {$lastCount} → {$currentCount}");
                    $this->line("   Hash: " . substr($lastHash, 0, 8) . " → " . substr($currentHash, 0, 8));
                    $this->newLine();

                    $lastHash = $currentHash;
                    $lastCount = $currentCount;
                } else {
                    $this->comment("⏳ [{$timestamp}] Tidak ada perubahan... ({$currentCount} records)");
                }


                sleep(3);
            } catch (\Exception $e) {
                $this->error(" [{$timestamp}] Error: " . $e->getMessage());
                sleep(3);
            }
        }
    }
}
