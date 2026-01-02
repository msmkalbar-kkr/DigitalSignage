let chartThree = null;

export const initChartThree = () => {
    const chartElement = document.querySelector("#chartThree");
    if (!chartElement || !window.skrdBulanan) return;

    // 🔴 WAJIB: destroy chart lama
    if (chartThree) {
        chartThree.destroy();
        chartThree = null;
    }

    const chartThreeOptions = {
        series: [
            {
                name: "Jumlah SKRD",
                data: window.skrdBulanan,
            },
        ],
        colors: ["#465FFF"],
        chart: {
            type: "area",
            height: "100%",
            width: "100%",
            parentHeightOffset: 0,
            redrawOnParentResize: true,
            redrawOnWindowResize: true,
            toolbar: { show: false },
        },
        fill: {
            gradient: {
                enabled: true,
                opacityFrom: 0.45,
                opacityTo: 0,
            },
        },
        stroke: {
            curve: "smooth",
            width: 2,
        },
        markers: { size: 0 },
        dataLabels: { enabled: false },
        grid: {
            xaxis: { lines: { show: false } },
            yaxis: { lines: { show: true } },
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "Mei",
                "Jun",
                "Jul",
                "Agu",
                "Sep",
                "Okt",
                "Nov",
                "Des",
            ],
        },
        yaxis: {
            min: 0,
            forceNiceScale: true,
            title: { text: "Jumlah SKRD" },
        },
        tooltip: {
            y: {
                formatter: (val) => `${val} SKRD`,
            },
        },
    };

    chartThree = new ApexCharts(chartElement, chartThreeOptions);
    chartThree.render();

    // 🔥 paksa recalculation setelah layout settle
    setTimeout(() => {
        window.dispatchEvent(new Event("resize"));
    }, 150);
};

export default initChartThree;
