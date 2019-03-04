<template>
	<b-container>
		<b-form class="m-3" method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="_token" v-model="csrfToken">
			<b-form-group label="Ingresa tu correo electronico:">
				<b-form-input
				id="exampleInput1" name="email"
				type="email"
				v-model="user.email"
				required
				placeholder="Ingrese correo" />
			</b-form-group>

			<b-form-group label="Ingresa tu nombre:">
				<b-form-input
				type="text"  name="name"
				v-model="user.name"
				required
				placeholder="Ingrese nombre" />
			</b-form-group>

			<b-form-group label="Nueva contraseña (solo si se desea modificar):">
				<b-form-input type="password" name="password"/>
			</b-form-group>

			<b-form-group label="Imagen de perfil (solo si se desea modificar):">
				<b-img rounded="circle" :src="image" width="62" height="62" alt="Imagen de perfil" class="m-1" />
				<b-form-file placeholder="Seleccione una imagen" name="image"/>
			</b-form-group>



			<b-button type="submit" variant="primary">Guardar cambios</b-button>
		</b-form>
  	</b-container>
</template>

<script>
  	export default {
		props:{
			user: Object,
			csrfToken: String
		},
		data() {
			return {

			}
		},
		computed:{
			image(){
				return `/users/${this.user.image}`
			}
		}
  	}
</script>