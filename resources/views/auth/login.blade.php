@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Inicio de session">
            
                <b-form  method="POST" action="{{ route('login') }}">
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

                    <b-form-group  label="Correo electronico:" label-for="email">
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

                    <b-form-group>
                        <b-form-checkbox name="remember" id="remember" {{ old('remember') ? 'checked="true"' : '' }}>
                            Recordar contrseña
                        </b-form-checkbox>
                    </b-form-group>

                    <b-form-group>
                        <b-button type="submit" variant="primary">
                            Ingresar
                        </b-button>
                        <b-button  href="{{ route('password.request') }}" variant="link">
                            ¿Olvidaste tu contraseña?
                        </b-button>
                    </b-form-group>

                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
