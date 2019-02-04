@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Registo de usuarios">
                
                <b-form  method="POST" action="{{ route('register') }}">
                    @csrf
                    @if($errors->any())
                        <b-alert show variant="danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="mb-0">{{  $error }}</li>
                                @endforeach
                            </ul>
                        </b-alert>
                    @endif
                    <b-form-group  label="Nombre:" label-for="name">
                        <b-form-input type="name"
                            id="name" name="name"
                            value="{{ old('name') }}" required autofocus
                            placeholder="Ingrese su nombre">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group  label="Correo electrónico:" label-for="email" description="Nunca compartiremos tu correo, esta seguro con nosotros.">
                        <b-form-input type="email"
                            id="email" name="email"
                            value="{{ old('email') }}" required autofocus
                            placeholder="Ingrese correo">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group label="Contraseña:" label-for="password">
                        <b-form-input type="password"
                            id="password" name="password" required
                            placeholder="Ingrese contraseña">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group label="Repita la contraseña:" label-for="password_confirmation">
                        <b-form-input type="password"
                            id="password-confirm" name="password_confirmation"
                            required
                            placeholder="Ingrese contraseña">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group>
                        <b-button type="submit" variant="primary">
                            Registrarse
                        </b-button>
                        <b-button  href="{{ route('login') }}" variant="link">
                            ¿Ya tienes una cuenta?
                        </b-button>
                    </b-form-group>

                </b-form>
            </b-card>
        </b-col cols="8">
    </b-row>
</b-container>
@endsection
