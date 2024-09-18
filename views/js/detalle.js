
	// Ejemplo de uso
	const parametro = getParameterByName('chipid');

	buscar(parametro).then( data => {
		let main = document.querySelector("main");
		data.forEach(estacion => {
			main.innerHTML +=`
				${estacion.estacion}<br>
				${estacion.ubicacion}
			`
		})	
	})

	function getParameterByName(name) {
	    const urlParams = new URLSearchParams(window.location.search);
	    return urlParams.get(name);
	}

	/**
     * 
     * @brief Realiza el logueo con el email y contraseña GET
     * @param string nombre del usuario
     * @param string pass contraseña del usuario
     * @return json respuesta del intento de logueo
     * 
     * */
    async function buscar(parametro){
        /*< consulta a la API */
        const response = await fetch("https://mattprofe.com.ar/proyectos/app-estacion/datos.php?chipid="+parametro+"&cant=1");
        /*< convierte la respuesta a formato json */
        const data = await response.json();

        return data;
    }
