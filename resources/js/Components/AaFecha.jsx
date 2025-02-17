export function AaFecha (value, change) {

    return(
        <>
            <label htmlFor="fecha">Fecha:</label><br />
            <input
                className="text-black"
                type="date"
                id="fecha"
                name="fecha"
                value={value} // Valor controlado
                onChange={change} // Manejar cambios
                required
            />

        </>
    )
}