/**
 * WP Mermaid - Gutenberg Block.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

(function(wpBlocks) {
	const { registerBlockType } = wpBlocks;

	registerBlockType("mermaid/display-block", {
		title: "Mermaid",
		icon: 'chart-pie',
		category: "formatting",
		attributes: {
			content: {
				type: "string",
				source: "html",
				selector: "div"
			}
		},
		edit({ className, attributes, setAttributes }) {
			const content = attributes.content;

			function onChangeContent(content) {
				setAttributes({ content });
			}

			let rendered;
			try {
				rendered = '<div class="mermaid">' + content + '</div>';

				mermaid.init();
			} catch (e) {
				rendered = `<span style='color: red; text-align: center;'>${e}</span>`;
			}

			return wp.element.createElement(
				"div",
				{ className: "wp-block-mermaid-block-editor" },
				[
					wp.element.createElement("div", { className: "mermaid-editor" }, [
						wp.element.createElement(wp.editor.PlainText, {
							onChange: onChangeContent,
							value: content
						}),
						wp.element.createElement("hr")
					]),
					wp.element.createElement("div", {
						className,
						dangerouslySetInnerHTML: {
							__html: rendered
						}
					})
				]
			);
		},
		save({ attributes }) {
			const content = attributes.content;

			return wp.element.createElement(
				"div",
				{
					className: "mermaid"
				},
				content
			);
		},
		deprecated: [
			{
				attributes: {
					content: {
						type: "string",
						source: "html",
						selector: "div"
					}
				},
				save({ attributes }) {
					const content = attributes.content;

					return wp.element.createElement(
						"div",
						{
							className: "mermaid"
						},
						content
					);
				}
			}
		]
	});
})(wp.blocks);
