import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center  pt-6 sm:justify-center sm:pt-0 bg-gradient-to-r from-gray-900 via-blue-950 to-slate-950">
            <div>
                <Link href="/">
                    <ApplicationLogo className="h-20 w-20 fill-current text-gray-500" />
                </Link>
            </div>

            <div className="mt-6 w-full overflow-hidden bg-gray-900 px-6 py-4 shadow-md shadow-gray-950 sm:max-w-md sm:rounded-lg ">
                {children}
            </div>
        </div>
    );
}
