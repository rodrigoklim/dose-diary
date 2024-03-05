<script setup lang="ts">
import ContentCard from "@/Components/ContentCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";

defineProps<{
  mustVerifyEmail?: boolean;
  status?: string;
}>();
</script>

<template>
  <Head>
    <title>Minha Conta</title>
  </Head>

  <AuthenticatedLayout>
    <template #header>
      <h6 class="text-2xl font-semibold text-gray-800">Minha Conta</h6>
      <span class="text-sm mt-4 text-gray-600"
        >Deixe sua conta segura e controle suas informações pessoais, acessos pelas redes sociais e pagamentos.</span
      >
    </template>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-4 gap-4">
          <div class="col-span-2 flex flex-col w-full space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <DeleteUserForm class="max-w-xl" />
            </div>
          </div>
          <div class="col-span-2">
            <ContentCard class="w-[60%]">
              <div class="w-full flex flex-col p-6">
                <span class="material-symbols-outlined text-7xl text-primary"> verified_user </span>
                <span class="text-lg mt-4 poppins-semibold">Informações Pessoais</span>
                <span class="poppins-regular flex w-full mt-4">
                  O dados são particulares e sigilosos. Ocultamos alguns dados da conta para proteger sua identidade.
                </span>
              </div>
            </ContentCard>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
