export const name = "hmr-demo/block-a";
import Edit from "../components/Edit";

//import "./style.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { Spinner } = wp.components;
const { withSelect } = wp.data;
export const options = {
	title: "Sample Block A",

	description: "Render another sample block.",

	icon: "images-alt",
	attributes: {
		content: {
			type: "string",
		},
		data: {
			type: "array",
			default: [],
		},
		title: {
			type: "string",
			selector: "h2",
		},
		link: {
			type: "string",
			selector: "a",
		},
		selectedPost: {
			type: "number",
			default: 0,
		},
		numberOfPosts: {
			type: "number",
			default: 1,
		},
	},
	category: "widgets",
	edit: withSelect((select) => {
		return {
			posts: select("core").getEntityRecords("postType", "post"),
		};
	})(Edit),
	save() {
		// Rendering in PHP
		return null;
	},
};
