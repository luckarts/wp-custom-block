export const name = "hmr-demo/block-b";

export const options = {
	title: "Sample Block B",

	description: "Render another sample block.",

	icon: "images-alt",

	category: "widgets",

	edit() {
		return (
			<div>
				<h2>Block B ok</h2>
			</div>
		);
	},

	save() {
		return (
			<div>
				<h2>Block Btest !</h2>
			</div>
		);
	},
};
