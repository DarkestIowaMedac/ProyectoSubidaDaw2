import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center justify-center bg-gradient-to-r from-gray-800 via-blue-950 to-slate-950 p-6">
            <div className="mb-6">
                <Link href="/">
                    <ApplicationLogo className="h-24 w-24 text-white transition-transform transform hover:scale-110" />
                </Link>
            </div>

            <div className="w-full max-w-md bg-gray-900 px-6 py-6 rounded-2xl shadow-lg border border-gray-700">
                {children}
            </div>
        </div>
    );
}
