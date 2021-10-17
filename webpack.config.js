const path = require("path");

const HtmlWebpackPlugin = require("html-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

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
		},
		devtool: isDev ? "eval" : false,
		devServer: {
			port: 9090,
		},
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
							}
						},
						{
							loader: "postcss-loader",
							options: {
								sourceMap: isDev,
							}
						}
					]
				}
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
			new MiniCssExtractPlugin(),
		]
	};
}