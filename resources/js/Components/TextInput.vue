<script setup lang="ts">
import { emailValidation, lengthValidation, requiredValidation } from "@/Composables/validation";
import { onMounted, ref, watch } from "vue";

const props = defineProps<{
  label: string;
  type: "text" | "password" | "email";
  showPassword?: boolean;
  rules?: "required" | "email" | "phone" | "length";
}>();

const emit = defineEmits<{
  (e: "change-visibility"): void;
  (e: "error-message", message: string): void;
}>();

const model = defineModel<string>({ required: true });
const hasError = ref(false);
const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
  if (input.value?.hasAttribute("autofocus")) {
    input.value?.focus();
  }
});

defineExpose({ focus: () => input.value?.focus() });

const validateField = (rule: string) => {
  switch (rule) {
    case "required": {
      requiredValidation(model.value, props.label, showErrorMessage);
      break;
    }

    case "email": {
      emailValidation(model.value, props.label, showErrorMessage);
      break;
    }

    case "length": {
      lengthValidation(model.value, props.label, 8, showErrorMessage);
      break;
    }
  }
};

const showErrorMessage = (message: string) => {
  hasError.value = true;
  emit("error-message", message);
};

watch(model, () => {
  hasError.value = false;
  emit("error-message", "");
});
</script>

<template>
  <div class="flex flex-row items-center w-full">
    <input
      ref="input"
      v-model="model"
      :type="props.showPassword ? 'text' : props.type"
      class="border-gray-300 w-full focus:ring-primary focus:ring-2 focus:border-opacity-0 rounded-md shadow-sm"
      :class="{ 'ring-2 ring-red-400': hasError }"
      @blur="validateField(rules)"
    />
    <span
      v-if="type === 'password'"
      class="-ml-8 cursor-pointer material-symbols-outlined"
      @click="$emit('change-visibility')"
    >
      {{ props.showPassword ? "visibility_off" : "visibility" }}
    </span>
  </div>
</template>
