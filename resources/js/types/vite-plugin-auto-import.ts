// コンポーネントの自動インポート用のファイル
import fg from 'fast-glob';
import { join } from 'path';

const componentsDir = "path/to/your/components/directory"; // Set the correct path

const componentFiles = fg.sync("**/*.vue", { cwd: componentsDir });

const components = componentFiles.reduce<Record<string, string>>(
    (acc, file) => {
        const filePath = join(componentsDir, file);
        const importName = file
            .replace(/^\//, "")
            .replace(/\.vue$/, "")
            .replace(/\//g, "_")
            .replace(/[^\w]/g, "");

        acc[importName] = filePath;
        return acc;
    },
    {}
);

export default components;
