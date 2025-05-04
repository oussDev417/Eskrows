@php
    $workingMap = getContent('working_map.content', true);
@endphp
<section class="how-it--work pb-100 position-relative">
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-content-4 d-flex justify-content-center flex-column align-items-center mb-60">
                    <div class="d-inline-flex heading--wrap">
                        <h6 class="heading text--base text-center text--upper">
                            {{ __($workingMap->data_values->heading) }}</h6>
                    </div>
                    <h6 class="title wow animate__animated animate__fadeInUp text-center fs--32 fw--700 splite-text"
                        data-splitting data-wow-delay="0.2s">{{ __($workingMap->data_values->subheading) }}</h6>
                    <p class="subtitle wow animate__animated animate__fadeInUp text-center fs-16 fw--400 w--80"
                        data-wow-delay="0.3s">{{ __(strWords($workingMap->data_values->description, 30)) }}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4">
            <div class="col-lg-12">
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
</section>
@push('style')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
@endpush
@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'js/amindex.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/map.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/worldlow.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/animated.js') }}"></script>
@endpush
@push('script')
    <script>
        am5.ready(function() {
            var root = am5.Root.new("chartdiv");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            root._logo.dispose();

            var chart = root.container.children.push(am5map.MapChart.new(root, {
                panX: "none",
                panY: "none",
                projection: am5map.geoMercator()
            }));

            chart.set("wheelX", "none");
            chart.set("wheelY", "none");
            chart.set("pinchZoom", false);

            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_worldLow,
                exclude: ["AQ"]
            }));

            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
                fill: am5.color("#72be0e"),
                stroke: am5.color("#ffffff")
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color("#388E3C")
            });

            polygonSeries.mapPolygons.template.states.create("active", {
                fill: am5.color("#2E7D32")
            });

            chart.chartContainer.get("background").events.on("click", function() {
                chart.goHome();
            });

            chart.appear(1000, 100);
        });
    </script>
@endpush
