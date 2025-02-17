import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import DeleteUserForm from './Partials/DeleteUserForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';

export default function Edit({ mustVerifyEmail, status }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-2xl font-bold text-gray-800 dark:text-white">
                    Configuración de Perfil
                </h2>
            }
        >
            <Head title="Perfil" />

            <div className="py-12 flex justify-center">
                <div className="w-full max-w-5xl lg:space-y-8 lg:px-14 md:space-y-8 md:px-14 sm:space-y-8 sm:px-16  bg-gradient-to-r from-gray-900 via-blue-950 to-slate-950 rounded-lg p-10">
                    
                    {/* Información del Perfil */}
                    <div className="bg-white dark:bg-slate-800 border border-gray-700 shadow-md rounded-lg p-6">
                        <h3 className="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">
                            Información del Perfil
                        </h3>
                        <UpdateProfileInformationForm
                            mustVerifyEmail={mustVerifyEmail}
                            status={status}
                            className="w-full"
                        />
                    </div>

                    {/* Cambiar Contraseña */}
                    <div className="bg-white dark:bg-slate-800 border border-gray-700 shadow-md rounded-lg p-6">
                        <h3 className="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">
                            Cambiar Contraseña
                        </h3>
                        <UpdatePasswordForm className="w-full" />
                    </div>

                    {/* Eliminar Cuenta */}
                    <div className="bg-red-50 dark:bg-slate-800 shadow-md rounded-lg p-6 border border-red-400">
                        <h3 className="text-lg font-semibold text-red-600 dark:text-red-400 mb-4">
                            Eliminar Cuenta
                        </h3>
                        <DeleteUserForm className="w-full" />
                    </div>

                </div>
            </div>
        </AuthenticatedLayout>
    );
}
