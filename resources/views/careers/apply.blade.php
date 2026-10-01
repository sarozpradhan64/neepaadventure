<x-layouts.app>
    <x-header />
    <main class="bg-surface w-full pt-48 pb-24">
        <div class="max-w-3xl mx-auto px-gutter-mobile lg:px-gutter-desktop">
            <div class="mb-8">
                <a href="{{ route('careers.show', $job->slug) }}" class="inline-flex items-center text-primary font-label-md hover:underline mb-6">
                    <x-lucide-arrow-left class="size-4 mr-2" />
                    Back to Job Details
                </a>
                
                <h1 class="font-headline-lg text-headline-lg text-on-surface font-bold mb-3">
                    Apply for {{ $job->title }}
                </h1>
                <p class="text-tertiary font-body-md">
                    Please fill out the form below to submit your application. Fields marked with an asterisk (*) are required.
                </p>
            </div>

            <div class="bg-surface-container-lowest p-space-lg sm:p-space-xl border-surface-container-low rounded-xl border shadow-md">
                @if (session('error') || request()->query('error') === 'post_too_large')
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6 text-sm flex items-start border border-red-100">
                        <x-lucide-alert-circle class="size-5 mr-3 shrink-0 mt-0.5" />
                        <div>
                            <span class="font-bold block mb-1">Upload Error</span>
                            {{ session('error') ?? 'The total size of the uploaded files exceeds the server limit.' }}
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6 text-sm">
                        <div class="font-bold flex items-center mb-2">
                            <x-lucide-alert-circle class="size-5 mr-2" />
                            Please fix the following errors:
                        </div>
                        <ul class="list-disc pl-10 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('careers.submit', $job->slug) }}" method="POST" enctype="multipart/form-data" class="gap-space-md flex flex-col">
                    @csrf
                    
                    <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                        <div class="gap-space-2xs flex flex-col">
                            <label for="first_name" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">First Name *</label>
                            <div class="relative flex items-center">
                                <x-lucide-user class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required 
                                    placeholder="E.g. Pasang"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none">
                            </div>
                        </div>
                        <div class="gap-space-2xs flex flex-col">
                            <label for="last_name" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Last Name *</label>
                            <div class="relative flex items-center">
                                <x-lucide-user class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required 
                                    placeholder="E.g. Sherpa"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="gap-space-md grid grid-cols-1 sm:grid-cols-2">
                        <div class="gap-space-2xs flex flex-col">
                            <label for="email" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Email Address *</label>
                            <div class="relative flex items-center">
                                <x-lucide-mail class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                    placeholder="E.g. pasang.sherpa@example.com"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none">
                            </div>
                        </div>
                        <div class="gap-space-2xs flex flex-col">
                            <label for="phone" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Phone Number <span class="text-tertiary font-normal text-xs normal-case">(Optional)</span></label>
                            <div class="relative flex items-center">
                                <x-lucide-phone class="left-space-sm text-tertiary absolute size-[18px]" />
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                                    placeholder="E.g. +977 9841234567"
                                    class="pr-space-sm py-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border pl-10 shadow-sm transition-all focus:ring-2 focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-container-low p-space-md rounded-xl border border-surface-container gap-space-md flex flex-col mt-space-md">
                        <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface border-b border-surface-container pb-space-xs uppercase">Documents</h3>
                        
                        <div class="gap-space-2xs flex flex-col">
                            <label for="cv" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">CV / Resume * <span class="text-tertiary font-normal text-xs normal-case">(PDF, DOC, DOCX up to 1MB)</span></label>
                            <input type="file" id="cv" name="cv" required accept=".pdf,.doc,.docx"
                                class="w-full bg-surface-container-lowest border-surface-container rounded-lg px-4 py-2 text-on-surface focus:ring-2 focus:ring-primary-container outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-container file:text-on-primary-container hover:file:bg-amber-flare border shadow-sm transition-all">
                        </div>
                        
                        <div class="gap-space-2xs flex flex-col">
                            <label for="cover_letter" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Cover Letter <span class="text-tertiary font-normal text-xs normal-case">(Optional)</span></label>
                            <textarea id="cover_letter" name="cover_letter" rows="6" 
                                class="p-space-sm bg-surface-container-lowest text-on-surface font-body-md text-body-md border-surface-container focus:ring-primary-container w-full rounded-lg border shadow-sm transition-all focus:ring-2 focus:outline-none" placeholder="Tell us why you are a great fit...">{{ old('cover_letter') }}</textarea>
                        </div>

                        <div class="gap-space-2xs flex flex-col">
                            <label for="license" class="font-label-sm text-label-sm text-on-surface font-bold uppercase">Guide / Trekking License <span class="text-tertiary font-normal text-xs normal-case">(PDF, JPG, PNG up to 1MB)</span></label>
                            <input type="file" id="license" name="license" accept=".pdf,.jpg,.jpeg,.png"
                                class="w-full bg-surface-container-lowest border-surface-container rounded-lg px-4 py-2 text-on-surface focus:ring-2 focus:ring-primary-container outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-surface-container file:text-on-surface hover:file:bg-surface-container-high border shadow-sm transition-all">
                        </div>

                        <div class="space-y-4" x-data="{
                            errors: {{ Js::from($errors->getMessages()) }},
                            docs: [
                                { id: 1, file: null, fileName: '', isImage: false, preview: '' },
                                { id: 2, file: null, fileName: '', isImage: false, preview: '' },
                                { id: 3, file: null, fileName: '', isImage: false, preview: '' }
                            ],
                            handleFile(event, index) {
                                const file = event.target.files[0];
                                if (!file) return;
                                this.docs[index].file = file;
                                this.docs[index].fileName = file.name;
                                if (file.type.startsWith('image/')) {
                                    this.docs[index].isImage = true;
                                    this.docs[index].preview = URL.createObjectURL(file);
                                } else {
                                    this.docs[index].isImage = false;
                                    this.docs[index].preview = null;
                                }
                            },
                            removeDoc(index, elId) {
                                this.docs[index].file = null;
                                this.docs[index].fileName = '';
                                this.docs[index].isImage = false;
                                this.docs[index].preview = '';
                                document.getElementById(elId).value = '';
                            }
                        }">
                            <label class="block font-label-md font-bold text-on-surface mb-4">Other Documents <span class="text-tertiary font-normal text-xs">(Up to 3 files, max 1MB each, e.g. Experience Certificate)</span></label>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <template x-for="(doc, index) in docs" :key="doc.id">
                                    <div x-show="doc.file || index === docs.findIndex(d => !d.file)"
                                         x-transition
                                         class="relative bg-surface-container-lowest border-2 border-surface-container rounded-xl h-full min-h-[220px] transition-all group overflow-visible"
                                         :class="doc.file ? 'border-solid shadow-sm' : 'border-dashed hover:border-primary/50 hover:bg-surface-container-low cursor-pointer'">
                                        
                                        <!-- File Input -->
                                        <input type="file" :id="`other_file_${index}`" x-bind:name="`other_documents[${index}][file]`" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                               @change="handleFile($event, index)"
                                               class="absolute inset-0 w-full h-full opacity-0 z-20"
                                               :class="!doc.file ? 'cursor-pointer' : 'pointer-events-none'"
                                               :required="index === 0 && docs.some(d => d.file)">

                                        <!-- Empty State (+) -->
                                        <div x-show="!doc.file" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-tertiary group-hover:text-primary transition-colors pointer-events-none">
                                            <div class="w-14 h-14 rounded-full bg-surface-container group-hover:bg-primary/10 flex items-center justify-center mb-4 transition-colors">
                                                <x-lucide-plus class="size-7" />
                                            </div>
                                            <span class="font-label-md font-bold text-center">Add Document</span>
                                        </div>

                                        <!-- Selected State -->
                                        <div x-show="doc.file" class="flex flex-col h-full bg-surface border border-surface-container rounded-xl p-4 relative z-30">
                                            <button type="button" @click="removeDoc(index, `other_file_${index}`)" title="Remove Document" 
                                                class="absolute -top-3 -right-3 bg-red-100 text-red-600 hover:bg-red-600 hover:text-white p-1.5 rounded-full shadow-md transition-colors border border-red-200 hover:border-red-600 z-40">
                                                <x-lucide-x class="size-4" />
                                            </button>
                                            
                                            <!-- Preview Area -->
                                            <div class="flex-1 flex flex-col items-center justify-center min-h-[110px] mb-4 bg-surface-container-low rounded-lg overflow-hidden relative">
                                                <template x-if="doc.isImage">
                                                    <img :src="doc.preview" class="absolute inset-0 w-full h-full object-cover">
                                                </template>
                                                <template x-if="!doc.isImage">
                                                    <div class="flex flex-col items-center justify-center p-4">
                                                        <x-lucide-file-text class="size-10 text-primary opacity-80 mb-2" />
                                                        <span class="text-xs font-semibold text-center text-tertiary break-all line-clamp-2" x-text="doc.fileName"></span>
                                                    </div>
                                                </template>
                                            </div>

                                            <!-- Title Input -->
                                            <div class="mt-auto">
                                                <input type="text" x-bind:name="`other_documents[${index}][title]`" placeholder="Document Title *" x-bind:required="doc.file" :disabled="!doc.file"
                                                    class="w-full bg-surface-container border-0 rounded-lg px-4 py-2.5 text-on-surface text-sm focus:ring-2 focus:ring-primary outline-none transition-shadow relative z-40">
                                                <template x-if="errors[`other_documents.${index}.title`]">
                                                    <p class="text-red-600 text-xs mt-1 font-semibold" x-text="errors[`other_documents.${index}.title`][0]"></p>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="pt-space-sm flex justify-end">
                        <button type="submit" class="py-space-sm px-space-lg bg-primary-container hover:bg-amber-flare text-on-primary-fixed font-label-lg text-label-lg gap-space-xs flex items-center justify-center rounded-lg font-bold tracking-wider uppercase shadow-md transition-all">
                            <x-lucide-send class="size-4" />
                            <span>Submit Application</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts.app>
