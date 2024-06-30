import { defineConfig } from "vite";
import path from "path";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig({
  root: path.resolve(__dirname, "assets", "src"),
  build: {
    outDir: "../dist/",
    emptyOutDir: true,
    minify: true,
    rollupOptions: {
      input: {
        index: path.resolve(__dirname, "assets", "src", "index.js"),
      },
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
      watch: {
        include: [
          path.resolve(__dirname, "assets", "src", "index.js"),
          path.resolve(__dirname, "templates", "**", "*.php"),
        ],
      },
    },
  },
  css: {
    postcss: {
      plugins: [tailwindcss, autoprefixer],
    },
  },
});
