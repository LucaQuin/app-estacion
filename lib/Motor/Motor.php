<?php 

	/**
	 * 
	 * Motor de plantillas
	 * 
	 * */
	class Motor{

		public $buffer;
		private $vista;

		/**
		 * 
		 * Carga la vista especificada al momento de la instancia
		 * @param string $name nombre la vista
		 * 
		 * */
		function __construct($name){
			$this->load($name);
		}

		/**
		 * 
		 * Carga la vista y la retorna como un string
		 * @param string $tpl es el nombre de la vista
		 * 
		 * */
		function load($tpl){
			$this->vista = $tpl;
			var_dump($tpl);

			if (strpos($tpl, "A") == false) {
			    if(!file_exists('views/'.$tpl.'View.html')){
					echo "Error la vista <b>$tpl</b> no existe.";
					exit();
				}else{
					$this->buffer = file_get_contents('views/'.$tpl.'View.html');
				}
			} else {
			    if(!file_exists('Store-X_css/html/'.$tpl.'.html')){
					echo "Error la vista <b>$tpl</b> no existe.";
					exit();
				}else{
					$this->buffer = file_get_contents('Store-X_css/html/'.$tpl.'.html');
				}
			}
		}

		/**
		 * 
		 * Reemplaza las variables dentro de la plantilla
		 * @param array $var es un vector asociativo nombre variable y valor
		 * 
		 * */
		function setVars($var){
			foreach ($var as $needle => $value) {

				if($this->testVar($needle)){
					$this->buffer = str_replace("{{".$needle."}}", $value, $this->buffer);
				}else{

					echo "Error la variable <b>$needle</b> no existe en la vista <b>".$this->vista."</b>";

					exit();
				}
			}
		}

		/**
		 * 
		 * Verifica que una variable exista dentro de la vista
		 * @return bool existe|no existe la variable 
		 * 
		 * */
		private function testVar($name){
			return strpos($this->buffer, "{{".$name."}}");
		}

		/**
		 * 
		 * Retorna el contenido del atributo $vista
		 * @return string nombre de la vista
		 * 
		 * */
		function getVista($value){
			return $this->vista;
		}

		/**
		 * 
		 * Imprime la vista en pantalla
		 * 
		 * */
		function print(){
			echo $this->buffer;
		}

	}


 ?>