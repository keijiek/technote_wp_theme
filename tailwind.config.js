/** @type {import('tailwindcss').Config} */
export default {
  content: ["templates/**/*.php"],
  theme: {
    fontFamily: {
      myFamily: [
        "Helvetica Neue",
        "Arial",
        "Hiragino Kaku Gothic ProN",
        "Hiragino Sans",
        "Meiryo",
        "sans-serif",
      ],
      english: ["Helvetica Neue", "sans-serif"],
    },
    extend: {},
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio"),
    require("@tailwindcss/forms"),
    require("daisyui"),
  ],
  darkMode: ["selector", '[data-theme="night"]'],
  daisyui: {
    themes: ["winter", "night"],
  },
};
