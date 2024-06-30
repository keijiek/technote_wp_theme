# wordpress テンプレート開発 with tailwindcss & alpinejs

主眼は、tailwindcss を wordpress に使う事。導入とカスタマイズは bootstrap より簡単だった。

## 私の環境

- wsl の ubuntu を使用。
- bun.js を使用。npm を使う場合、コマンドの`bun`を`npm`、`bunx`を`npx`に読み替え。
- 動作確認用にレンタルサーバー上の wordpress を用い、vscode の sftp 拡張等を利用してファイル保存時に自動アップロード。

---

## 開発環境構築

プロジェクトディレクトリのルートで次を実行。

### 1. パッケージのインストール

```bash
bun i -D vite tailwindcss autoprefixer @tailwindcss/typography @tailwindcss/forms @tailwindcss/aspect-ratio alpinejs
```

その他、tailwind の UI プラグインは選定中。

### 2. gitignore

```bash
touch .gitignore
git init
```

`.gitignore` には、[https://github.com/github/gitignore](https://github.com/github/gitignore)の wordpress や node 用のテンプレートを参考にふさわしい値を設定。

### 3. package.json の編集

いったん、package.json を編集する。`"type": "module"` を効かせるため。

```json
{
  "type": "module",
  "scripts": {
    "dev": "vite",
    "build": "vite build",
    "watch": "vite build --watch",
    "preview": "vite preview"
  }
  // (略)
}
```

開発中は `bun run watch` を使うことになるはず。

### 4. tailwind.config.js

次を実行し、`tailwind.config.js`を作成。

```bash
bunx tailwindcss init
```

まず、tailwindcss が参照するファイルを指定するため、`content`の値(string の array)を、下記の例を参考に編集。

ふさわしい値は開発時のディレクトリ構成によって変わるはずなので、参考程度に。

wordpress 向けとしてよく見られる設定は `content: ["./**/*.php"]` だが、対象範囲が広すぎると思う。

```js
/** @type {import('tailwindcss').Config} */
export default {
  content: ["views/**/*.php", "templates/**/*.php"],
  // 略
};
```

次に、導入した 3 つのプラグインを有効とするために次の様に編集。

aspect-ratio の導入には、tailwindcss 本体に含まれる同様の機能をオフにする必要がある点に注意。

```js
/** @type {import('tailwindcss').Config} */
export default {
  // 略
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/forms"),
  ],
  // 略
};
```

### 5. vite.config.js を編集

```bash
touch vite.config.js
```

このプロジェクトの[vite.config.js](./vite.config.js)を参照。

開発時のディレクトリ構成によって値は変わるはず。

### 6. ファイル、フォルダ作成

ルート直下のファイル群を作成。作成するものは作るものに合わせて選ぶ。style.css の記述内容もふさわしいものに。

```bash
echo "<?php" | tee index.php singular.php 404.php archive.php functions.php front-page.php
echo -e "/*\n  Theme Name: your_theme_name\n  Author: your_name\n  Version: 0.0.1\n*/" > ./style.css
```

次に、vite で root に設定しているディレクトリやファイルを作成。

alpinejs も tailwind と一緒にビルドされるよう、エントリーポイント(assets/src/index.js)でインポート。

```bash
mkdir -p assets/{src,imgs,dist,prism}
echo -e "import './index.css';\nimport Alpine from 'alpinejs';\nwindow.Alpine = Alpine;\nAlpine.start();" > ./assets/src/index.js
echo -e "@tailwind base;\n@tailwind components;\n@tailwind utilities;" > ./assets/src/index.css
```
