const { SelectControl, PanelBody, RangeControl } = wp.components;
import { useState, useEffect } from "@wordpress/element";
import Article from "./Article";
const { withSelect, useSelect } = wp.data;
const { InspectorControls, InnerBlocks } = wp.blockEditor;
const { __ } = wp.i18n;
const { useEntityProp } = wp.coreData;
const Edit = ({ attributes, setAttributes, posts }) => {
	const { data, selectedPost, numberOfPosts } = attributes;
	const [options, setOptions] = useState([
		{ value: 0, label: "Select a Post" },
	]);
	const postType = useSelect(
		(select) => select("core/editor").getCurrentPostType(),
		[]
	);
	const [meta, setMeta] = useEntityProp("postType", postType, "meta");
	console.log(postType, "type");
	const metaFieldValue = meta["myguten_meta_block_field"];
	// check data call useEffect:
	useEffect(() => {
		if (posts !== null && posts.length > 0) {
			setAttributes({ data: posts });
			posts.forEach((post, index) => {
				options.push({
					value: index + 1,
					label: post.title.rendered,
				});
			});
		}
	}, [posts]);

	// attributes.selectedPost update && return data selected in selectList
	useEffect(() => {
		if (posts !== null && selectedPost !== 0 && posts.length > 0) {
			setAttributes({ content: posts[selectedPost - 1] });
		}
	}, [selectedPost, posts]);

	return (
		<div>
			<InspectorControls key="inspector">
				<PanelBody title={__("Posts settings", "block-a")}></PanelBody>
				<SelectControl
					value={selectedPost}
					label={"Select a Post"}
					options={options}
					onChange={(id) => {
						setAttributes({ selectedPost: Number(id) });
					}}
				/>
			</InspectorControls>

			{selectedPost === 0 && <p>Select a Post</p>}
			{selectedPost !== 0 && data && <Article {...attributes} />}
		</div>
	);
};

export default Edit;
