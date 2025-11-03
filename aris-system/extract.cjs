// extract_final.cjs

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// --- Configuration ---
const outputFile = 'extracted.txt';
const includeDirs = [
    'app/', 'bootstrap/', 'config/', 'database/migrations/', 'public/', 'resources/', 'routes/'
];
const includeRootFiles = [
    '.env.example', 'tailwind.config.js', 'vite.config.js', 'jsconfig.json', 'postcss.config.cjs', 'README.md'
];

const binaryExtensions = ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.ico', '.woff', '.woff2', '.ttf', '.eot'];
// --- End Configuration ---

console.log('Starting focused extraction with Node.js...');

try {
    if (fs.existsSync(outputFile)) {
        fs.unlinkSync(outputFile);
    }

    // THIS IS THE FIX:
    // We removed the '--others' flag. Now, `git ls-files` will list ALL tracked files
    // in the repository, giving the script the full list of files to filter.
    const command = 'git ls-files';
    const allProjectFiles = execSync(command).toString().split('\n').filter(Boolean);

    let allContent = [];

    for (const filePath of allProjectFiles) {
        let shouldInclude = false;

        const extension = path.extname(filePath).toLowerCase();
        if (binaryExtensions.includes(extension)) {
            // This part is correct, we still want to skip binary files.
            continue;
        }

        if (includeRootFiles.includes(filePath)) {
            shouldInclude = true;
        } else {
            for (const dir of includeDirs) {
                // Ensure correct path matching on Windows by replacing backslashes
                if (filePath.replace(/\\/g, '/').startsWith(dir)) {
                    shouldInclude = true;
                    break;
                }
            }
        }

        if (shouldInclude && fs.existsSync(filePath) && fs.lstatSync(filePath).isFile()) {
            console.log(`Including: ${filePath}`);
            const header = `\n======================================================================\nFile: ${filePath}\n======================================================================\n\n`;
            const fileContent = fs.readFileSync(filePath, 'utf8');
            allContent.push(header, fileContent);
        }
    }

    console.log(`Writing all content to '${outputFile}'...`);
    fs.writeFileSync(outputFile, allContent.join(''));
    console.log('Focused extraction complete.');

} catch (error) {
    console.error('An error occurred during extraction:', error.message);
    process.exit(1);
}