Vue.createApp({
	data() {
		return {
			successMessage: "",
			errorMessage: "",
			logDetails: {
				email: '',
				password: ''
			},
		}
	},
	methods: {
		checkLogin() {

			if (this.logDetails.email.trim() == "" || this.logDetails.password.trim() == ""){
				console.log(this.logDetails.email)
				this.showError = true
				this.errorMessage = "Please fill in your email and Password!"
				this.logDetails.email = ''
				this.logDetails.password = ''
				return
			}

			// set self = this to prevent confusions of "this"
			let self = this;
			axios.post('process_login.php', {
				email: self.logDetails.email,
				password: self.logDetails.password
			}).then(function (response) {
				console.log(response)
				if (response.data.error) {
					self.errorMessage = response.data.message;
					self.logDetails.email = ''
					self.logDetails.password = ''
					console.log(self.errorMessage)
				} 
				else {
					console.log(response.data)
					postForm("success_redirect.php", {name:response.data.name})
					return;
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
