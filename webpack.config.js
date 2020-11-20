const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
  entry: ['./resources/js/index.js', './resources/scss/main.scss'],
  output: {
    path: path.resolve(__dirname, './dist'),
    publicPath: './dist',
    filename: 'main.js'
  },
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      },
      {
        test: /\.m?js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.(png|woff|woff2|eot|ttf|svg)$/, 
        loader: 'url-loader?limit=100000'
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../style.css'
    })
  ]
};