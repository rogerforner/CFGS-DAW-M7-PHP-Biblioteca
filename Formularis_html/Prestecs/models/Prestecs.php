<?php
// Mostrar errors.
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require_once("Exemplars.php");

/*******************************************************************************
 *********************************************************************** "Índex"
 * # Constructors
 * # Getters i Setters
 * # Funcions
 * ## llistarPrestecsTots()
 * ## llistarPrestecs()
 * ## llistarPrestecsTornats()
 * ## comptarPrestecs()
 * ## comptarExemplarsPrestats()
 * ## insertarPrestec()
 * ## eliminarPrestec()
 * ## editarPrestec()
 * ## validarPrestec()
 ******************************************************************************/
class Prestecs {
  private $id;
	private $dataSortida;
  private $dataMaxDevolucio;
  private $dataRealDevolucio;
  private $numPrestecs;
  private $maxPrestecs;
  private $exemplar;
  private $usuari;

  /*
  # Constructors
  ----------------------------------------------------------------------------*/
  /**
   * El constructor es cridat cada cop que l'objecte es creat:
   * $prestecs = new Prestecs();
   * Mitjançant aquest s'inicialitzaràn els atributs (arguments) de la classe.
   *
   * Són necessaris múltiples constructors però en PHP una classe només pot tenir
   * un sol constructor. Un fet que es soluciona simulant l'existència de més
   * d'un constructor a través del principal.
   *
   * El constructor es simula:
   * __constructNumeroArguments($argument, $argument, ...)
   * __construct1($arg1)
   * __construct2($arg1, $arg2)
   * __constructN(...)
   *
   * A través d'aquest constructor buit (sense arguments) duem a terme la
   * simulació de constructors.
   *
   * @author Roger Forner Fabre
   * @var args Conté un array dels arguments passats al constructor.
   * @var num Conté el número d'arguments que es passen al constructor.
   * @var f Emprada per simular un constructor.
   */
  public function __construct() {
    // Simular un constructor.
		$args = func_get_args();
		$num  = func_num_args();
		$f    ='__construct'. $num;

		if (method_exists($this, $f)) {
			call_user_func_array(array($this, $f), $args);
		}
	}

	public function __construct1($id) {
		$this->id = $id;
	}

  public function __construct2($id, $dataRealDevolucio) {
		$this->id                = $id;
    $this->dataRealDevolucio = $dataRealDevolucio;
	}

  public function __construct4($dataSortida, $dataMaxDevolucio, $exemplar, $usuari) {
    $this->dataSortida      = $dataSortida;
		$this->dataMaxDevolucio = $dataMaxDevolucio;
		$this->exemplar         = $exemplar;
		$this->usuari           = $usuari;
	}


  /*
  # Getters i Setters
  ----------------------------------------------------------------------------*/
  public function getId() {
    return $this->id;
  }

  public function getDataMaxDevolucio() {
    return $this->dataMaxDevolucio;
  }

  public function setDataMaxDevolucio($dataMaxDevolucio) {
    $this->dataMaxDevolucio = $dataMaxDevolucio;
  }

  public function getDataRealDevolucio() {
    return $this->dataRealDevolucio;
  }

  public function setDataRealDevolucio($dataRealDevolucio) {
    $this->dataRealDevolucio = $dataRealDevolucio;
  }

  public function getNumPrestecs() {
    return $this->numPrestecs;
  }

  public function setNumPrestecs($numPrestecs) {
    $this->numPrestecs = $numPrestecs;
  }

  public function getMaxPrestecs() {
    return $this->maxPrestecs;
  }

  public function setMaxPrestecs($maxPrestecs) {
    $this->maxPrestecs = $maxPrestecs;
  }

  public function getExemplar() {
    return $this->exemplar;
  }

  public function setExemplar($exemplar) {
    $this->exemplar = $exemplar;
  }

  public function getUsuari() {
    return $this->usuari;
  }

  public function setUsuari($usuari) {
    $this->usuari = $usuari;
  }


  /*
	# Funcions
	----------------------------------------------------------------------------*/
  /**
   * ## llistarPrestecsTots()
   * Mitjançant aquesta funció s'obtenen totes les files disponibles en la taula
   * Prestecs (1 fila = 1 prestec), junt a les seves columnes (dades dels préstecs).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * @author Roger Forner Fabre
   * @var prestecs Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return prestecs La funció retornarà un objecte Array.
   */
  public function llistarPrestecsTots() {
    $prestecs = array();
    $db       = Connectar::connexio();

    $query = $db->query("SELECT * FROM Prestecs;");

    while($files = $query->fetch_assoc()) {
      $prestecs[] = $files;
    }

    return $prestecs;
  }


  /**
   * ## llistarPrestecs()
   * Mitjançant aquesta funció s'obtenen les files desitjades de la taula
   * Prestecs (1 fila = 1 prestec), junt a les seves columnes (dades dels préstecs).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * En aquesta consulta s'obté:
   * - Prestecs.Usuari       -> ID usuari al que li fem el préstec.
   * - Usuaris.Nom           -> Nom usuari (INNER JOIN Usuaris).
   * - Usuaris.Cognom        -> Cognom usuari (INNER JOIN Usuaris).
   * - Llibres.Titol         -> Títol llibre (INNER JOIN Llibres).
   * - Prestecs.Data_sortida -> Data en el que es realitza el préstec.
   * - Prestecs.Data_maxima_devolucio -> Data d'entrega del préstec.
   *
   * Només s'obtenen aquelles files que no disposin de la "Data_real_devolucio".
   * Això es deu a que si un usuari no ha tornat el préstec aquesta no tindrà cap
   * valor assignat. Per tant, aquelles files que tinguin una data de devolució
   * no es mostraràn.
   *
   * Ordenarem les files segons:
   * - el nom de l'usuari.
   * - el títol del llibre.
   * - la data en la que s'efectua el préstec.
   *
   * @author Roger Forner Fabre
   * @var prestecs Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. Mitjançant la consulta s'uneixen
   * les taules Prestecs, Llibres i Usuaris.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return prestecs La funció retornarà un objecte Array.
   */
  public function llistarPrestecs() {
    $prestecs = array();
    $db       = Connectar::connexio();

    $query = $db->query("SELECT Prestecs.ID_Prestec,
      Prestecs.Usuari,
      Usuaris.Nom AS Usuari_nom,
      Usuaris.Cognom AS Usuari_cognom,
      Llibres.Titol AS Llibre_titol,
      Prestecs.Data_sortida,
      Prestecs.Data_maxima_devolucio
      FROM Prestecs
      INNER JOIN Usuaris ON Prestecs.Usuari = Usuaris.ID_Usuari
      INNER JOIN Llibres ON Prestecs.Exemplar = Llibres.ID_Llibres
      WHERE (Data_real_devolucio IS NULL OR Data_real_devolucio = '')
      ORDER BY Usuaris.Nom, Llibres.Titol, Prestecs.Data_sortida
    ;");

    while($files = $query->fetch_assoc()) {
      $prestecs[] = $files;
    }

    return $prestecs;
  }


  /**
   * ## llistarPrestecsTornats()
   * Mitjançant aquesta funció s'obtenen les files desitjades de la taula
   * Prestecs (1 fila = 1 prestec), junt a les seves columnes (dades dels préstecs).
   * Aquestes files són guardades en un array per poder obtenir, més tard, les
   * dades desitjades.
   *
   * En aquesta consulta s'obté:
   * - Prestecs.Usuari       -> ID usuari al que li fem el préstec.
   * - Usuaris.Nom           -> Nom usuari (INNER JOIN Usuaris).
   * - Usuaris.Cognom        -> Cognom usuari (INNER JOIN Usuaris).
   * - Llibres.Titol         -> Títol llibre (INNER JOIN Llibres).
   * - Prestecs.Data_sortida -> Data en el que es realitza el préstec.
   * - Prestecs.Data_real_devolucio -> Data en la que es torna el préstec.
   *
   * Només s'obtenen aquelles files que no disposin de la "Data_maxima_devolucio".
   * Això es deu a que si un usuari ha tornat el préstec aquesta no tindrà cap
   * valor assignat, li llevem el valor que tenia perqué en realitat ja no l'ha
   * de tornar. Per tant, aquelles files que disposin d'una data máxima de
   * devolució no seràn mostrades.
   *
   * Ordenarem les files segons:
   * - el nom de l'usuari.
   * - el títol del llibre.
   * - la data en la que s'efectua el préstec.
   *
   * @author Roger Forner Fabre
   * @var prestecs Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. Mitjançant la consulta s'uneixen
   * les taules Prestecs, Llibres i Usuaris.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return prestecs La funció retornarà un objecte Array.
   */
  public function llistarPrestecsTornats() {
    $prestecs = array();
    $db       = Connectar::connexio();

    $query = $db->query("SELECT Prestecs.ID_Prestec,
      Prestecs.Usuari,
      Usuaris.Nom AS Usuari_nom,
      Usuaris.Cognom AS Usuari_cognom,
      Llibres.Titol AS Llibre_titol,
      Prestecs.Data_sortida,
      Prestecs.Data_real_devolucio
      FROM Prestecs
      INNER JOIN Usuaris ON Prestecs.Usuari = Usuaris.ID_Usuari
      INNER JOIN Llibres ON Prestecs.Exemplar = Llibres.ID_Llibres
      WHERE (Data_maxima_devolucio IS NULL OR Data_maxima_devolucio = '')
      ORDER BY Usuaris.Nom, Llibres.Titol, Prestecs.Data_sortida
    ;");

    while($files = $query->fetch_assoc()) {
      $prestecs[] = $files;
    }

    return $prestecs;
  }


  /**
   * ## comptarPrestecs()
   * Mitjançant aquesta funció obtenim el total de préstecs que té un usuari
   * en concret.
   *
   * En aquesta consulta s'obté:
   * - COUNT(*) -> Comptar totes les files, però...
   *
   * Només s'obtenen aquelles files que tinguin un id d'usuari específic i que,
   * a més a més, no tinguin una Data_real_devolucio perqué no ens interessa
   * mostrar aquells préstecs que hagin estat tornats.
   *
   * Ordenarem les files segons:
   * - el nom de l'usuari.
   * - el títol del llibre.
   * - la data en la que s'efectua el préstec.
   *
   * @author Roger Forner Fabre
   * @param usuari Paràmetre de la funció que representa la ID de l'usuari.
   * @var prestecs Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. Mitjançant la consulta s'uneixen
   * les taules Prestecs, Llibres i Usuaris.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return prestecs La funció retornarà un objecte Array.
   */
  public function comptarPrestecs($usuari) {
    $prestecs = array();
    $db       = Connectar::connexio();

    $query = $db->query("SELECT COUNT(*) AS Total
      FROM Prestecs
      INNER JOIN Usuaris ON Prestecs.Usuari = Usuaris.ID_Usuari
      INNER JOIN Llibres ON Prestecs.Exemplar = Llibres.ID_Llibres
      WHERE Usuari = $usuari AND (Data_real_devolucio IS NULL OR Data_real_devolucio = '')
      ORDER BY Usuaris.Nom, Llibres.Titol, Prestecs.Data_sortida
    ;");

    while($files = $query->fetch_assoc()) {
      $prestecs[] = $files;
    }

    return $prestecs;
  }


  /**
   * ## comptarExemplarsPrestats()
   * Mitjançant aquesta funció obtenim el total d'exemplars, d'un llibre en
   * concret, que han estat prestats.
   *
   * En aquesta consulta s'obté:
   * - COUNT(*) -> Comptar totes les files, però...
   *
   * Només s'obtenen aquelles files que tinguin un id d'exemplar específic i que,
   * a més a més, no tinguin una Data_real_devolucio perqué no ens interessa
   * comptar aquells préstecs que hagin estat tornats.
   *
   * @author Roger Forner Fabre
   * @param exemplar Paràmetre de la funció que representa la ID de l'exemplar.
   * @var exemplars Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var query Consulta a dur a terme a la DB. Mitjançant la consulta s'uneixen
   * les taules Prestecs, Llibres i Usuaris.
   * @var files Variable en la que es guarda un array associatiu "fetch_assoc()",
   * aquest corresponent a una sola fila de la taula consultada.
   * @return exemplars La funció retornarà un objecte Array.
   */
  public function comptarExemplarsPrestats($exemplar) {
    $exemplars = array();
    $db        = Connectar::connexio();

    $query = $db->query("SELECT COUNT(*) AS Total
      FROM Prestecs
      INNER JOIN Llibres ON Prestecs.Exemplar = Llibres.ID_Llibres
      WHERE Prestecs.Exemplar = $exemplar AND (Data_real_devolucio IS NULL OR Data_real_devolucio = '')
    ;");

    while($files = $query->fetch_assoc()) {
      $exemplars[] = $files;
    }

    return $exemplars;
  }


  /**
   * ## insertarPrestec()
   * Mitjançant aquesta funció s'inserta un prestec a la base de dades.
   *
   * @author Roger Forner Fabre
   * @param dataSortida Paràmetre de la funció que representa la data d'entrega
   * del préstec.
   * @param dataMaxDevolucio Paràmetre de la funció que representa la data en la
   * que s'ha de tornar el préstec.
   * @param exemplar Paràmetre de la funció que representa la ID de l'exemplar.
   * @param usuari Paràmetre de la funció que representa la ID de l'usuari.
   * @var prestecs Array en el que es guardarà el resultat de la consulta (query)
   * que es dugui a terme a la DB.
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   */
  public function insertarPrestec($dataSortida, $dataMaxDevolucio, $exemplar, $usuari) {
    $db = Connectar::connexio();

    $db->query("INSERT INTO Prestecs(Data_sortida, Data_maxima_devolucio, Exemplar, Usuari)
		VALUES(
			'$dataSortida',
			'$dataMaxDevolucio',
			'$exemplar',
			'$usuari'
		)");
  }


  /**
   * ## eliminarPrestec()
   * Mitjançant aquesta funció s'elimina un prestec, en concret, de la DB.
   *
   * Només s'elimina aquell préstec que es correspongui a la id passada.
   *
   * @author Roger Forner Fabre
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var this->id ID obtinguda a través del métode POST del formulari.
   */
  public function eliminarPrestec() {
    $db = Connectar::connexio();

    $db->query("DELETE FROM Prestecs WHERE ID_Prestec = $this->id");
  }


  /**
   * ## editarPrestec()
   * Mitjançant aquesta funció es determina si un préstec, en concret, ha estat
   * tornat. No s'elimina.
   *
   * Quan un préstec hagi estat tornat posarem a null "Data_maxima_devolucio"
   * perquè ja no és necessari. En canvi, li donarem un valor a "Data_real_devolucio"
   * ja que és la nova data obtinguda i la qual determina quan ha estat tornat el
   * préstec.
   *
   * Només s'aplicarà sobre aquell préstec que tingui la ID passada.
   *
   * @author Roger Forner Fabre
   * @var db Objecte emprat per connectar-nos la DB, fent referència a la classe
   * Connectar() i, específicament, al seu mètode conneccio().
   * @var this->dataRealDevolucio Data actual, obtinguda a través del métode POST
   * del formulari.
   * @var this->id ID obtinguda a través del métode POST del formulari.
   */
  public function editarPrestec() {
    $db = Connectar::connexio();

    $db->query("UPDATE Prestecs
      SET Data_maxima_devolucio = null,
      Data_real_devolucio = '$this->dataRealDevolucio'
      WHERE ID_Prestec = $this->id
    ;");
  }


  /**
   * ## validarPrestec()
   * Mitjançant aquesta funció es valida un préstec per tal de determinar si es
   * podrà dur a terme o no.
   *
   * @author Roger Forner Fabre
   * @var dataSortida Data actual, obtinguda a través del métode POST del formulari.
   * @var dataMaxDevolucio Data actual + 1 setmana, obtinguda a través del métode
   * POST del formulari.
   * @var exemplar ID de l'exemplar, obtingut a través del métode POST del formulari.
   * @var usuari ID de l'usuari, obtingut a través del métode POST del formulari.
   * @var dataActual Emprada per saber si s'ha superat la data de devolució.
   * @var prestecs Objecte de la classe Prestecs().
   * @var exemplars Objecte de la classe Exemplars().
   * @var exemplarsP Objecte de la classe Prestecs().
   * @var totalPrestecs Conté el total de préstecs d'un usuari en concret.
   * @var totalExemplars Conté el total d'exemplars d'un llibre en concret.
   * @var totalExemplarsPrestats Conté el total d'exemplars prestats d'un llibre
   * en concret.
   * @var exemplarsRestants El seu valor és la resta del total d'exemplars d'un
   * llibre i el total d'exemplars que s'han prestat d'aquest mateix llibre.
   * Si tenim 22 llibres de A i en prestem 2 del mateix: 22-2 = 20
   */
  public function validarPrestec() {
    $dataSortida      = $this->dataSortida;
    $dataMaxDevolucio = $this->dataMaxDevolucio;
    $exemplar         = $this->exemplar;
    $usuari           = $this->usuari;
    $dataActual       = date('Y-m-j');
    $prestecs         = new Prestecs();
    $exemplars        = new Exemplars();
    $exemplarsP       = new Prestecs();

    $totalPrestecs          = $prestecs->comptarPrestecs($usuari);
    $totalExemplars         = $exemplars->totalExemplars($exemplar);
    $totalExemplarsPrestats = $exemplarsP->comptarExemplarsPrestats($exemplar);

    $exemplarsRestants = $totalExemplars[0]['Quantitat_exemplars'] - $totalExemplarsPrestats[0]['Total'];

    // Quants préstecs ha efectuat l'usuari?
    if ($totalPrestecs[0]['Total'] == 3) {
      $resultat = 1;

    // L'usuari ha superat el plaç d'entrega?
    } elseif ($dataMaxDevolucio < $dataActual) {
      $resultat = 2;

    // Queden exemplars que prestar?
    } elseif ($exemplarsRestants < 1) {
      $resultat = 3;

    // Dur a terme el préstec.
    } else {
      $resultat = $prestecs->insertarPrestec($dataSortida, $dataMaxDevolucio, $exemplar, $usuari);
    }

    return $resultat;
  }
}
?>
