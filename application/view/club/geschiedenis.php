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
						"startDate":"2012-09-22",
						"endDate":"2012-09-22",
						"headline":"Oprichting",
						"text":"De club werd opgericht!",
						"asset": {
							"asset":"",
							"thumbnail":"",
							"type": "",
							"caption":"",
						}
					},
					{
						"startDate":"2013-01-27",
						"endDate":"",
						"headline":"Eerste Lustrum",
						"text":"Het Lustrum",
						"asset": {
							"asset":"<?php echo URL; ?>img/schild.png",
							"thumbnail":"<?php echo URL; ?>img/schild.png",
							"type": "image",
							"caption":"",
						}
					}
				],
				"config": {
					"zoom": 1,
					"keyboardCommands": true,
					"date": {
						"language": "nl",
						"format": "d F Y",
						"buttonFormat": "d.m.y"
					}
				}
			};

			$("#jquery-timeline").jqueryTimeline(data);
		});
</script>

