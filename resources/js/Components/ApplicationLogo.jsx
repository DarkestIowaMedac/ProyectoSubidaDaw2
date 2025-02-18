export default function ApplicationLogo(props) {
    return (
        <img
            {...props}
            src="citolytics.png" // Asegúrate de colocar la ruta correcta
            alt="Logo"
            className="w-44 h-auto" // Ajusta el tamaño según necesites
        />
    );
}
