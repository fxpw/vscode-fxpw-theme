<template>
	<div id="app" class="container">
		<h1 class="title">{{ title }}</h1>
		<p class="description">{{ description }}</p>
		<button class="cta-button" @click="changeTitle">Сменить заголовок</button>
		<button class="cta-button" @click="toggleDescription">Показать/Скрыть Описание</button>
		<button class="cta-button" @click="incrementCounter">Увеличить счетчик</button>
		<p class="counter">Счетчик: {{ counter }}</p>
		<button class="cta-button" @click="showAlert">Показать предупреждение</button>
		<div v-if="showExtra">
			<p>Это дополнительный текст, который отображается по нажатию кнопки.</p>
		</div>
	</div>
</template>

<script>
export default {
	name: 'App',
	data() {
		return {
			title: 'Добро пожаловать в Vue.js!',
			description: 'Это пример страницы, созданной с использованием Vue.js.',
			counter: 0,
			showExtra: false
		};
	},
	methods: {
		changeTitle() {
			this.title = this.title === 'Добро пожаловать в Vue.js!' ? 'Вы изменили заголовок!' : 'Добро пожаловать в Vue.js!';
		},
		toggleDescription() {
			this.showExtra = !this.showExtra;
		},
		incrementCounter() {
			this.counter++;
		},
		showAlert() {
			alert('Это сообщение предупреждения!');
		}
	}
}
</script>

<style scoped>
.container {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	height: 100vh;
	background-color: #2c3e50;
	color: #ecf0f1;
	font-family: 'Arial', sans-serif;
}

.title {
	font-size: 2.5em;
	margin-bottom: 20px;
}

.description {
	font-size: 1.2em;
	margin-bottom: 30px;
	max-width: 600px;
	text-align: center;
}

.cta-button {
	padding: 10px 20px;
	font-size: 1em;
	color: #fff;
	background-color: #e74c3c;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	transition: background-color 0.3s ease;
	margin-bottom: 10px;
}

.cta-button:hover {
	background-color: #c0392b;
}

.counter {
	font-size: 1.5em;
	margin-top: 20px;
	color: #fff;
}
</style>
