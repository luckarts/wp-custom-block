const Article = ({ content, selectedPost }) => {
	const viewArticle = document.querySelector("#viewArticle");

	const load = () => {
		const viewArticle = document.querySelector("#viewArticle");
		if (selectedPost !== 0 && content) {
			viewArticle.innerHTML = content.content.rendered;
		}
	};
	//dangerouslySetInnerHTML={load()} 	{attributes.selectedPost === 0 && <p>Select a Post</p>}
	return (
		<div dangerouslySetInnerHTML={load()}>
			<div id="viewArticle"></div>
		</div>
	);
};
export default Article;
