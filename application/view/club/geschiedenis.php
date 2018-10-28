<div class="container text-center">
	<H1>THOR's geschiedenis</H1>
	<div id="jquery-timeline"></div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery-timeline.js"></script>

<script>
	jQuery(function($){
			var data = {
				"timeline": [
					{
						"startDate":"2009-06-27",
						"endDate":"2010-01-01",
						"headline":"Only text",
						"text":"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
						"asset": {
							"asset":"",
							"thumbnail":"",
							"type": "",
							"caption":"",
						}
					},
					{
						"startDate":"2010-01-27",
						"endDate":"",
						"headline":"Text and image",
						"text":"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
						"asset": {
							"asset":"img/lorempixel01.jpg",
							"thumbnail":"img/lorempixel01.jpg",
							"type": "image",
							"caption":"",
						}
					},
					{
						"startDate":"2010-04-27",
						"endDate":"",
						"headline":"Text and image",
						"text":"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
						"asset": {
							"asset":"img/lorempixel01.jpg",
							"thumbnail":"img/lorempixel01.jpg",
							"type": "image",
							"caption":"",
						}
					},
					{
						"startDate":"2010-05-27",
						"endDate":"",
						"headline":"Text and image",
						"text":"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
						"asset": {
							"asset":"img/lorempixel01.jpg",
							"thumbnail":"img/lorempixel01.jpg",
							"type": "image",
							"caption":"",
						}
					}
				],
				"config": {
					"zoom": 1,
					"keyboardCommands": true,
					"date": {
						"language": "de",
						"format": "d F Y",
						"buttonFormat": "d.m.y"
					}
				}
			};

			$("#jquery-timeline").jqueryTimeline(data);
		});
</script>

