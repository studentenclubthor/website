<?php

class Evenementen extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->data = json_decode('{
   "data": [
      {
         "description": "Na een korte vakantie voor velen en de enge maand van oktober door te zijn gekomen, maken wij het nog een laatste keer griezelig op 8 november in de Maxim\'O!\n\nWe halen het beest in ons naar boven met een Purple Rain (Blue curacao met Sprite en Flugel)! Kom bescherming zoeken bij de bonken van THOR en gezelligheid bij de dames!\n\nWe zien jullie daar!\nGroetjes en griezels van het bestuur!",
         "end_time": "2018-11-08T23:00:00+0100",
         "is_draft": false,
         "place": {
            "name": "MAXIM\'O",
            "location": {
               "city": "Leuven",
               "country": "Belgium",
               "latitude": 50.87711,
               "longitude": 4.70083,
               "street": "Naamsestraat 35",
               "zip": "3000"
            },
            "id": "398045853591392"
         },
         "start_time": "2018-11-08T20:00:00+0100",
         "type": "public",
         "id": "2287394288155281",
         "name": "Thoroween clubavond",
         "cover": {
            "offset_x": 50,
            "offset_y": 50,
            "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/45093814_2177870165579132_92955058064326656_o.jpg?_nc_cat=109&_nc_ht=scontent.xx&oh=812d225a9bb6cbea2f6cdff2a4894f66&oe=5CAD6DAE",
            "id": "2177870152245800"
         }
      },
      {
         "description": "Het begint weer wat kouder te worden, daarom is bij elkaar kruipen een goed idee om het terug warm te krijgen...Alcohol helpt ook, zingen ook misschien? Pakt van wel!\nDaarom slaan Libertus en Thor de handen in elkaar om een (warme) cantus voor u te voorzien.\n\nPraktisch:\nLocatie: cantuszaal De Prosit (tegenover \'t Archief)\nDeuren: 20:00\nIo Vivat 20:30\nPrijs: 12 euro voor bier en 6 euro voor water\n\nIedereen is welkom!",
         "end_time": "2018-10-26T02:00:00+0200",
         "is_draft": false,
         "start_time": "2018-10-25T20:00:00+0200",
         "type": "public",
         "id": "267216850584999",
         "name": "LiberThor cantus",
         "cover": {
            "offset_x": 50,
            "offset_y": 50,
            "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/43442112_1596800920419790_1225264563646103552_o.jpg?_nc_cat=105&_nc_ht=scontent.xx&oh=8ea6100eac65dd40c9ee67ee89b14f5e&oe=5C69FDB2",
            "id": "1596800917086457"
         }
      },
      {
         "description": "Hier zijn we met de mosselen!\n\nOok zin om je buik vol met lekkers te steken in dit \u00e0 volont\u00e9 mosselfeest onder gezellige omstandigheden. al dan niet met kaarslicht.\nOmdat de doop van diana dit jaar op het zelfde moment valt hebben we het dan ook wat later gezet zodat deze mensen uiteraard laten nog kunnen aanschuiven.\n\nAlle leden en aanhangsels zijn welkom. Indien je geen aanhangsel bent, hoor dan eens bij het bestuur en dan valt er uiteraard wel iets te regelen.\n\nPrijs zal te bepalen zijn op de dag zelf.",
         "end_time": "2018-10-08T22:30:00+0200",
         "is_draft": false,
         "place": {
            "name": "Prins delignestraat 11 Heverlee"
         },
         "start_time": "2018-10-08T20:30:00+0200",
         "type": "public",
         "id": "250060832227052",
         "name": "THOR\'s Mosselfest",
         "cover": {
            "offset_x": 50,
            "offset_y": 50,
            "source": "https://scontent.xx.fbcdn.net/v/t1.0-9/s720x720/42908277_2128060417226774_4917807699325878272_o.jpg?_nc_cat=111&_nc_ht=scontent.xx&oh=64241fa7cdd5ec8d953f14f5f90838fc&oe=5CA46E26",
            "id": "2128060410560108"
         }
      }
	]
}',false,30);

		// var_dump($data->data[0]->place->name);
		// exit();
	}
	
    public function index(){
        // load views
		$events = $this->model->getEvents();
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function fotos(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/fotos.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function thorDeLouvain(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/thorDeLouvain.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function addEvent(){
		if($_POST){
			$naam = $_POST['naam'];
			$locatie = $_POST['locatie'];
			$start = $_POST['start'];
			$eind = $_POST['eind'];
			$banner = $_POST['banner'];
			$tekst = $_POST['tekst'];
		}
		$this->model->addEvent($naam,$locatie,$start,$eind,$banner,$tekst);
		$this->index();
	}
	
	public function addEvents(){
		foreach($this->data->data as $event){
			// var_dump($event);
			
			$url = $event->cover->source;
			$img = dirname('ROOT_PATH') . '/img/banner/' . $event->id . '.jpg';
			file_put_contents($img, file_get_contents($url));
			
			// var_dump(scandir());

			// $naam = $_POST['naam'];
			// $locatie = $_POST['locatie'];
			// $start = $_POST['start'];
			// $eind = $_POST['eind'];
			// $banner = $_POST['banner'];
			// $tekst = $_POST['tekst'];
		}
	}
	
	public function editEvent($id){
		$naam = $_POST['naam'];
		$locatie = $_POST['locatie'];
		$start = $_POST['start'];
		$eind = $_POST['eind'];
		$banner = $_POST['banner'];
		$tekst = $_POST['tekst'];
		$this->model->editEvent($id,$naam,$locatie,$start,$eind,$banner,$tekst);
		$this->index();
	}

	public function deleteEvent($id){
		$this->model->deleteEvent($id);
		$this->index();
	}
	
}
