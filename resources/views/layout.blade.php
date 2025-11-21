<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AWS Cloud Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
          },
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-500 bg-fixed font-sans">
  <div class="max-w-7xl mx-auto px-4 py-8 md:px-6">
    <div class="bg-white rounded-2xl p-6 md:p-8 mb-6 shadow-2xl border border-slate-200 backdrop-blur-sm">
      <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent flex items-center gap-3 m-0">
        <i class="bi bi-cloud-upload text-3xl md:text-4xl bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent"></i>
        AWS Cloud Management
      </h2>
    </div>
    
    @if(session('success'))
      <div class="bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 rounded-xl p-4 mb-6 shadow-lg border-l-4 border-green-500 font-medium animate-slide-down">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-2">
            <i class="bi bi-check-circle-fill text-green-600"></i>
            <span>{{ session('success') }}</span>
          </div>
          <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-green-600 hover:text-green-800">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
      </div>
    @endif

    <div class="bg-white rounded-2xl p-6 md:p-8 shadow-2xl border border-slate-200 backdrop-blur-sm">
      @yield('content')
    </div>
  </div>

  <style>
    @keyframes slide-down {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-slide-down {
      animation: slide-down 0.3s ease-out;
    }
  </style>
</body>
</html>
