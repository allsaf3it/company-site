function getChartColorsArray(t) {
    if (null !== document.getElementById(t)) {
      t = document.getElementById(t).getAttribute("data-colors");
      if (t)
        return (t = JSON.parse(t)).map(function (t) {
          var e = t.replace(" ", "");
          return -1 === e.indexOf(",")
            ? getComputedStyle(document.documentElement).getPropertyValue(e) || e
            : 2 == (t = t.split(",")).length
            ? "rgba(" +
              getComputedStyle(document.documentElement).getPropertyValue(t[0]) +
              "," +
              t[1] +
              ")"
            : e;
        });
    }
  }
  var chartColumnColors = getChartColorsArray("column_chart"),
    chartColumnDatatalabelColors =
      (chartColumnColors &&
        ((options = {
          chart: { height: 350, type: "bar", toolbar: { show: !1 } },
          plotOptions: {
            bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" },
          },
          dataLabels: { enabled: !1 },
          stroke: { show: !0, width: 2, colors: ["transparent"] },
          series: [
            { name: "Net Profit", data: [46, 57, 59, 54, 62] },
            { name: "Revenue", data: [74, 83, 102, 97, 86] },
          ],
          colors: chartColumnColors,
          xaxis: {
            categories: [
              "STRAXUSDT",
              "STRAXUSDT",
              "STRAXUSDT",
              "STRAXUSDT",
              "STRAXUSDT"
            ],
          },
          yaxis: { title: { text: "$ (thousands)" } },
          grid: { borderColor: "#f1f1f1" },
          fill: { opacity: 1 },
          tooltip: {
            y: {
              formatter: function (t) {
                return "$ " + t + " thousands";
              },
            },
          },
        }),
        (chart = new ApexCharts(
          document.querySelector("#column_chart"),
          options
        )).render()));
        // 2
        var chartColumnColors2 = getChartColorsArray("column_chart_2"),
          chartColumnDatatalabelColors =
            (chartColumnColors2 &&
              ((options = {
                chart: { height: 350, type: "bar", toolbar: { show: !1 } },
                plotOptions: {
                  bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" },
                },
                dataLabels: { enabled: !1 },
                stroke: { show: !0, width: 2, colors: ["transparent"] },
                series: [
                  { name: "Net Profit", data: [46, 57, 59, 54, 62] },
                  { name: "Revenue", data: [74, 83, 102, 97, 86] },
                ],
                colors: chartColumnColors2,
                xaxis: {
                  categories: [
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT"
                  ],
                },
                yaxis: { title: { text: "$ (thousands)" } },
                grid: { borderColor: "#f1f1f1" },
                fill: { opacity: 1 },
                tooltip: {
                  y: {
                    formatter: function (t) {
                      return "$ " + t + " thousands";
                    },
                  },
                },
              }),
              (chart = new ApexCharts(
                document.querySelector("#column_chart_2"),
                options
              )).render()));
  
        // 3
        var chartColumnColors3 = getChartColorsArray("column_chart_3"),
          chartColumnDatatalabelColors =
            (chartColumnColors3 &&
              ((options = {
                chart: { height: 350, type: "bar", toolbar: { show: !1 } },
                plotOptions: {
                  bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" },
                },
                dataLabels: { enabled: !1 },
                stroke: { show: !0, width: 2, colors: ["transparent"] },
                series: [
                  { name: "Net Profit", data: [46, 57, 59, 54, 62] },
                  { name: "Revenue", data: [74, 83, 102, 97, 86] },
                ],
                colors: chartColumnColors3,
                xaxis: {
                  categories: [
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT"
                  ],
                },
                yaxis: { title: { text: "$ (thousands)" } },
                grid: { borderColor: "#f1f1f1" },
                fill: { opacity: 1 },
                tooltip: {
                  y: {
                    formatter: function (t) {
                      return "$ " + t + " thousands";
                    },
                  },
                },
              }),
              (chart = new ApexCharts(
                document.querySelector("#column_chart_3"),
                options
              )).render()));
  
        // 4
        var chartColumnColors4 = getChartColorsArray("column_chart_4"),
          chartColumnDatatalabelColors =
            (chartColumnColors4 &&
              ((options = {
                chart: { height: 350, type: "bar", toolbar: { show: !1 } },
                plotOptions: {
                  bar: { horizontal: !1, columnWidth: "45%", endingShape: "rounded" },
                },
                dataLabels: { enabled: !1 },
                stroke: { show: !0, width: 2, colors: ["transparent"] },
                series: [
                  { name: "Net Profit", data: [46, 57, 59, 54, 62] },
                  { name: "Revenue", data: [74, 83, 102, 97, 86] },
                ],
                colors: chartColumnColors4,
                xaxis: {
                  categories: [
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT",
                    "STRAXUSDT"
                  ],
                },
                yaxis: { title: { text: "$ (thousands)" } },
                grid: { borderColor: "#f1f1f1" },
                fill: { opacity: 1 },
                tooltip: {
                  y: {
                    formatter: function (t) {
                      return "$ " + t + " thousands";
                    },
                  },
                },
              }),
              (chart = new ApexCharts(
                document.querySelector("#column_chart_4"),
                options
              )).render()));
  