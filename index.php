<?php	
	session_start();
	
	$_SESSION['canalSeleccionado'] = $_SERVER['DOCUMENT_ROOT'].'/aulae/tm-2015-servicios/configuraciones/requires.aulaE.php';
	//$_SESSION['canalSeleccionado'] = '/data/servicios/propio/aulaVirtual/tm-2015-servicios/configuraciones/requires.aulaE.php';

	require_once $_SESSION['canalSeleccionado'];

	
	$libreries = PATH_LIBRARIES;


	$canalesControl = new canalesControl();	
	try
		{
			//fn_retornarCodigoCanal: Retorna el código del canal, registra el ingreso al canal.
			$codigoCanal = $canalesControl->fn_retornarCodigoCanal();
						
			/*****************************************************************/
			if($codigoCanal != "")
				{
					//fn_leerDatosCanal: Retorna toda la informacion del canal.
					$datosCanal = $canalesControl->fn_leerDatosCanal($codigoCanal);
					
					/********************************************************/
					if($codigoCanal != "")
						{
							$_SESSION['canal']            = $canal;
							$_SESSION['idcanal']          = $codigoCanal;
							$_SESSION['descripcionCanal'] = $datosCanal[dsdescripcion_canal];

							include ("plantilla/plantilla.php");
						}
					/*********************************************************/
				}
			/*****************************************************************/
		}
	catch (Exception $e)
		{
			echo $e->getMessage();
		}
?>
