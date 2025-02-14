export function FormLayout (){


    return(
        <>
            <h1>Formulario de los cojones</h1>

            <br />

            <form action="/submit" method="post">
                
                <label htmlFor="nombre">Nombre:</label><br/>
                <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required/>
                <br/><br/>

                <label htmlFor="descripcion">Texto:</label><br/>
                <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Escribe un mensaje aquí..." required></textarea>
                <br/><br/>

                <button type="submit" className="">Enviar</button>
            </form>
        </>
    )


}