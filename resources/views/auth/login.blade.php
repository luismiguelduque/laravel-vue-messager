@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Inicio de session">
                <!--
                <p class="card-text">Header and footers using props.</p>
                <b-button href="#" variant="primary">Go somewhere</b-button>
                -->
                <b-form  method="POST" action="{{ route('login') }}">

                    <b-form-group  label="Correo electronico:" label-for="email" description="Nunca compartiremos tu correo, esta seguro con nosotros.">
                        <b-form-input type="email"
                            id="email" name="email"
                            value="{{ old('email') }}" required autofocus
                            placeholder="Ingrese correo">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group label="Contraseña:" label-for="password">
                        <b-form-input type="password"
                            id="password" name="password"
                            value="{{ old('password') }}" required
                            placeholder="Ingrese contraseña">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group>
                        <b-form-checkbox name="remember" id="remember" {{ old('remember') ? 'checked="true"' : '' }}>
                            Recordar contrseña
                        </b-form-checkbox>
                    </b-form-group>

                    <b-form-group label="Contraseña:" label-for="password">
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
