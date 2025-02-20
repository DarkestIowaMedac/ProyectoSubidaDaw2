import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { DashboardLayout } from '@/Layouts/DashboardLayout';

export default function Dashboard() {
    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-gradient-to-r from-slate-950 via-blue-950 to-slate-950 shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-400">
                            <h1 className="text-3xl text-white mb-6">Muestras Creadas</h1>
                            <div>
                                <DashboardLayout/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
