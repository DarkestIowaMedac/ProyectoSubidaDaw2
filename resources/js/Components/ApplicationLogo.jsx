export default function ApplicationLogo(props) {
    return (
        <img
            {...props}
            src="logo.png" // Asegúrate de colocar la ruta correcta
            alt="Logo"
            className="h-24 w-24" // Ajusta el tamaño según necesites
        />
    );
}
