const path = require("path");

const HtmlWebpackPlugin = require("html-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const FileManagerPlugin = require('filemanager-webpack-plugin');
const WebpackShellPluginNext = require('webpack-shell-plugin-next');

const publicPath = "/wp-content/themes/igenomix_store/";
const publicPathEscaped = "\/wp-content\/themes\/igenomix_store\/";

module.exports = function (env, opt) {
	const isProd = opt.mode === "production";
	const isDev = !isProd;

	return {
		mode: opt.mode,
		entry: {
			main: path.resolve(__dirname, "src/index.js"),
		},
		output: {
			filename: "[name].js",
			path: path.resolve(__dirname, "dist"),
			...(isProd ? {
				publicPath: publicPath,
			} : {}),
		},
		devtool: isDev ? "eval" : false,
		devServer: {
			port: 9090,
			compress: true,
			liveReload: true,
			watchFiles: [
				"src/**/*.html"
			],
		},
		target: isDev ? "web" : "browserslist",
		module: {
			rules: [
				{
					test: /\.m?js$/,
					exclude: /node_modules/,
					use: {
						loader: "babel-loader",
						options: {
							presets: ['@babel/preset-env']
						}
					}
				},
				{
					test: /\.css$/i,
					use: [
						MiniCssExtractPlugin.loader,
						{
							loader: "css-loader",
							options: {
								importLoaders: 1,
								sourceMap: isDev,
								url: false,
							}
						},
						{
							loader: "postcss-loader",
							options: {
								sourceMap: isDev,
							}
						}
					]
				},
				{
					test: /\.(png|svg|jpg|jpeg|gif)$/i,
					type: 'asset/resource',
				},
				{
					test: /\.(woff|woff2|eot|ttf|otf)$/i,
					type: 'asset/resource',
				},
			]
		},
		plugins: [
			new CleanWebpackPlugin(),
			new HtmlWebpackPlugin({
				filename: "index.html",
				template: path.resolve(__dirname, "src/index.html"),
			}),
			new HtmlWebpackPlugin({
				filename: "catalog.html",
				template: path.resolve(__dirname, "src/catalog.html"),
			}),
			new HtmlWebpackPlugin({
				filename: "product-archive.html",
				template: path.resolve(__dirname, "src/product-archive.html"),
			}),
			new MiniCssExtractPlugin(),
			new CopyPlugin({
				patterns: [
					{
						from: "src/image",
						to: "image",
					},
					{
						from: "src/font",
						to: "font",
					},
				]
			}),
			...(isProd ? [
				new FileManagerPlugin({
					events: {
						onEnd: {
							copy: [
								{
									source: "dist/(*.css|*.js)", destination: "igenomix_store/assets/",
								},
								{
									source: "dist/font/webfonts/*", destination: "igenomix_store/assets/font/webfonts/",
								},
								{
									source: "dist/image/*", destination: "igenomix_store/assets/image/",
								}
							]
						}
					}
				}),
				new WebpackShellPluginNext({
					onBuildEnd: {
						scripts: ["./font_path_replacement.sh igenomix_store/assets/main.css"],
						blocking: true,
						parallel: false,
					}
				}),
			] : []),
		]
	};
}