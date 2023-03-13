import { ref, readonly } from "vue";

export const defaultWindow = typeof window !== "undefined" ? window : undefined;
export const defaultDocument =
    typeof window !== "undefined" ? window.document : undefined;
export const defaultNavigator =
    typeof window !== "undefined" ? window.navigator : undefined;
export const defaultLocation =
    typeof window !== "undefined" ? window.location : undefined;

export function useFileDialog(options = {}) {
    const { document = defaultDocument } = options;

    const files = ref(null);

    let input;
    if (document) {
        input = document.createElement("input");
        input.type = "file";

        input.onchange = (event) => {
            const result = event.target;
            files.value = result.files;
        };
    }

    const open = (localOptions = {}) => {
        if (!input) return;
        const _options = {
            multiple: true,
            accept: "*",
            ...options,
            ...localOptions,
        };
        input.multiple = _options.multiple;
        input.accept = _options.accept;
        if (_options.capture) input.capture = _options.capture;

        input.click();
    };

    const reset = () => {
        files.value = null;
        if (input) input.value = "";
    };

    return {
        files: readonly(files),
        open,
        reset,
    };
}
