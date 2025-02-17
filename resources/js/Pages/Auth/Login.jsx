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
    
            {status && (
                <div className="mb-4 text-sm font-medium text-green-400">
                    {status}
                </div>
            )}
    
            <form onSubmit={submit} className="text-white">
                <div>
                    <InputLabel htmlFor="email" value="Email" className="text-white" />
    
                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                    />
    
                    <InputError message={errors.email} className="mt-2 text-red-400" />
                </div>
    
                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" className="text-white" />
    
                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />
    
                    <InputError message={errors.password} className="mt-2 text-red-400" />
                </div>
    
                <div className="mt-4 flex items-center">
                    <Checkbox
                        name="remember"
                        checked={data.remember}
                        onChange={(e) => setData('remember', e.target.checked)}
                        className="bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500"
                    />
                    <span className="ms-2 text-sm text-gray-400">Remember me</span>
                </div>
    
                <div className="mt-4 flex items-center justify-between">
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                            className="text-sm text-blue-400 hover:text-blue-300 underline transition"
                        >
                            Forgot your password?
                        </Link>
                    )}
    
                    <PrimaryButton className="ms-4 bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg transition" disabled={processing}>
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
    
}
