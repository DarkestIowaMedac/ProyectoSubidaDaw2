import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { FormLayout } from '@/Layouts/FormLayout';
import { BrowserRouter } from 'react-router-dom';

export default function Dashboard() {
    return (
        <BrowserRouter>
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Formulario
                </h2>
            }
        >
            <Head title="Formulario" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            
                            <FormLayout></FormLayout>

                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
        </BrowserRouter>
    );
}
