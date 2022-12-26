Vue.createApp({
	data() {
		return {
			successMessage: "",
			errorMessage: "",
			logDetails: {
				email: '',
				name: '',
				password: '',
				confirmPassword: ''
			},
		}
	},

	methods: {
		register() {
			if (this.logDetails.email.trim() == "" || this.logDetails.password.trim() == ""|| this.logDetails.confirmPassword.trim() == ""|| this.logDetails.name.trim() == ""){
				console.log(this.logDetails.email)
				this.showError = true
				this.errorMessage = "Please complete the form before registering!"
				this.logDetails.name = ''
				this.logDetails.email = ''
				this.logDetails.confirmPassword = ''
				this.logDetails.password = ''
				return
			}
			if (!this.logDetails.email.includes("@") ){
				this.showError = true
				this.errorMessage = "Please enter a correct email!"
				this.logDetails.confirmPassword = ''
				this.logDetails.password = ''
				return
			}
			// so that it wont confuse with the axios this  ***
			let self = this;
			axios.post('process_register.php', {

				email: self.logDetails.email,
				name: self.logDetails.name,
				password: self.logDetails.password,
				confirmPassword: self.logDetails.confirmPassword

			}).then(
				function (response) {
					console.log(response)
					console.log(response.data)
					if (response.data.error === true) {
						//reset and display error
						self.errorMessage = response.data.message;
						self.successMessage = '';
						self.logDetails.email = '';
						self.logDetails.password = '';
						self.logDetails.confirmPassword = '';
					} else {
						self.errorMessage = '';
						console.log(response.data)
						postForm("success_redirect.php", {name:response.data.name})
					}
				});

		},

		clearMessage() {
			this.errorMessage = '';
			this.successMessage = '';
		}

	}
}).mount('#app')

function postForm(path, params) {

    var form = document.createElement('form');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', path);

	for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
            hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}
