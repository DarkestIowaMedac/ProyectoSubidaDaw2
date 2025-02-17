import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            <div className="flex flex-col items-center">
                <div className="w-full max-w-md bg-gray-900 p-8 border border-gray-700 rounded-lg shadow-lg">
                    
                    {/* Título principal */}
                    <h2 className="text-2xl font-bold text-white text-center">Welcome Back!</h2>
                    <p className="text-sm text-gray-400 text-center mt-2">
                        Please enter your credentials to log in.
                    </p>

                    {/* Estado (mensaje de éxito o error) */}
                    {status && (
                        <div className="w-auto mt-4 text-lg font-medium text-green-400 text-center">
                            {status}
                        </div>
                    )}

                    <form onSubmit={submit} className="text-white space-y-6 mt-6">
                        {/* Email */}
                        <div>
                            <InputLabel htmlFor="email" value="Email" className="text-white font-medium" />
                            <TextInput
                                id="email"
                                type="email"
                                name="email"
                                value={data.email}
                                className="mt-1 block w-full bg-gray-700 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                autoComplete="username"
                                isFocused={true}
                                onChange={(e) => setData('email', e.target.value)}
                            />
                            <InputError message={errors.email} className="mt-2 text-red-400" />
                        </div>

                        {/* Password */}
                        <div>
                            <InputLabel htmlFor="password" value="Password" className="text-white font-medium" />
                            <TextInput
                                id="password"
                                type="password"
                                name="password"
                                value={data.password}
                                className="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                autoComplete="current-password"
                                onChange={(e) => setData('password', e.target.value)}
                            />
                            <InputError message={errors.password} className="mt-2 text-red-400" />
                        </div>

                        {/* Remember Me */}
                        <div className="flex items-center">
                            <Checkbox
                                name="remember"
                                checked={data.remember}
                                onChange={(e) => setData('remember', e.target.checked)}
                                className="bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500"
                            />
                            <span className="ms-2 text-sm text-gray-400">Remember me</span>
                        </div>

                        {/* Botones y enlaces */}
                        <div className="flex items-center justify-between">
                            {canResetPassword && (
                                <Link
                                    href={route('password.request')}
                                    className="text-sm text-blue-400 hover:text-blue-300 underline transition"
                                >
                                    Forgot your password?
                                </Link>
                            )}
                            <PrimaryButton className="ms-4 bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-lg transition font-semibold" disabled={processing}>
                                Log in
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </GuestLayout>
    );
    
}
