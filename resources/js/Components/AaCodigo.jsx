export function AaCodigo (value, change) {

    return(
        <>
            <label htmlFor="codigo">Código:</label><br />
            <input
                className="text-black"
                type="text"
                id="codigo"
                name="codigo"
                value={value} // Valor controlado
                onChange={change} // Manejar cambios
                required
            />

        </>
    )
}