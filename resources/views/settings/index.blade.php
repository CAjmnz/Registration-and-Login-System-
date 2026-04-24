@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">
        User Settings
    </h1>

    <!-- Success Message -->

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Settings Form -->

    <form method="POST" action="{{ route('settings.update') }}">

        @csrf

        <!-- Theme Selection -->

        <div class="mb-4">

            <label class="block font-semibold mb-2">
                Theme
            </label>

            <select
                name="theme"
                class="w-full border p-2 rounded"
            >

                <option value="light"
                    {{ $settings->theme == 'light' ? 'selected' : '' }}>
                    Light
                </option>

                <option value="dark"
                    {{ $settings->theme == 'dark' ? 'selected' : '' }}>
                    Dark
                </option>

            </select>

        </div>

        <!-- Font Size Selection -->

        <div class="mb-6">

            <label class="block font-semibold mb-2">
                Font Size
            </label>

            <select
                name="font_size"
                class="w-full border p-2 rounded"
            >

                <option value="small"
                    {{ $settings->font_size == 'small' ? 'selected' : '' }}>
                    Small
                </option>

                <option value="medium"
                    {{ $settings->font_size == 'medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="large"
                    {{ $settings->font_size == 'large' ? 'selected' : '' }}>
                    Large
                </option>

            </select>

        </div>

        <!-- Submit Button -->

        <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
            Save Settings
        </button>

    </form>

</div>

@endsection