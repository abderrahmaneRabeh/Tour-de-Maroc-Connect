<?php require_once APPROOT . "/inc/header.php"; ?>
<?php require_once APPROOT . "/inc/navbar.php"; ?>

<div class="container mx-auto px-4 py-8">
    <!-- Alert Messages -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?= $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <!-- Cyclist Profile Header -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="relative h-64 bg-red-700">
            <!-- Profile Image and Basic Info -->
            <div class="absolute bottom-0 left-0 w-full p-6 flex items-end">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img 
                            src="<?= $data['cyclist']->img ? htmlspecialchars($data['cyclist']->img) : URLROOT . '/public/img/default-avatar.png' ?>" 
                            alt="<?= htmlspecialchars($data['cyclist']->nom) ?>"
                            class="w-32 h-32 rounded-full border-4 border-white object-cover"
                        />
                    </div>
                    
                    <div class="text-white">
                        <h1 class="text-3xl font-bold"><?= htmlspecialchars($data['cyclist']->nom) ?></h1>
                        <div class="flex items-center mt-2">
                            <div class="mr-6">
                                <span class="block text-sm text-gray-300">Nationality</span>
                                <span class="text-lg"><?= htmlspecialchars($data['cyclist']->nationalite ?? 'N/A') ?></span>
                            </div>
                            <?php if($data['team']): ?>
                            <div>
                                <span class="block text-sm text-gray-300">Team</span>
                                <span class="text-lg"><?= htmlspecialchars($data['team']->nom) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Column - Bio & Stats -->
                <div class="md:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h2 class="text-xl font-semibold mb-4">Cyclist Stats</h2>
                        <div class="space-y-3">
                            <div>
                                <h3 class="text-sm text-gray-500">Total Points</h3>
                                <p class="font-medium"><?= number_format($data['stats']['points']) ?></p>
                            </div>
                            <div>
                                <h3 class="text-sm text-gray-500">Current Ranking</h3>
                                <p class="font-medium"><?= getOrdinal($data['stats']['ranking']) ?></p>
                            </div>
                            <div>
                                <h3 class="text-sm text-gray-500">Average Speed</h3>
                                <p class="font-medium"><?= $data['stats']['averageSpeed'] ?> km/h</p>
                            </div>
                        </div>
                    </div>
                    
                    <?php if (!empty($data['cyclist']->bio)): ?>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-4">Biography</h2>
                        <p class="text-gray-700"><?= nl2br(htmlspecialchars($data['cyclist']->bio)) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Right Column - Performance History -->
                <div class="md:col-span-2">
                    <h2 class="text-2xl font-semibold mb-4">Race Results</h2>
                    
                    <?php if (empty($data['performances'])): ?>
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <p class="text-gray-700">No race results available for this cyclist.</p>
                        </div>
                    <?php else: ?>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stage</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distance</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <?php foreach($data['performances'] as $performance): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="py-4 px-4">
                                                <div class="font-medium text-blue-600 hover:text-blue-800">
                                                    <a href="<?= URLROOT ?>/etapes/details/<?= $performance->etape_id ?>">
                                                        <?= htmlspecialchars($performance->etape_nom) ?>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 text-sm text-gray-700">
                                                <?= date('d M Y', strtotime($performance->date_depart)) ?>
                                            </td>
                                            <td class="py-4 px-4 text-sm text-gray-700">
                                                <?= number_format($performance->distance_km, 1) ?> km
                                            </td>
                                            <td class="py-4 px-4 text-sm text-gray-700">
                                                <?= formatTimeInterval($performance->temps_total) ?>
                                            </td>
                                            <td class="py-4 px-4 text-sm font-medium">
                                                <?= getOrdinal($performance->classement) ?>
                                            </td>
                                            <td class="py-4 px-4 text-sm text-gray-700">
                                                <?= number_format($performance->points) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Helper function to format time interval
function formatTimeInterval($interval) {
    // Convert PostgreSQL interval to a readable format
    if (!$interval) return 'N/A';
    
    // Handle PostgreSQL interval format
    if (is_string($interval)) {
        $parts = explode(':', $interval);
        if (count($parts) >= 3) {
            $hours = intval($parts[0]);
            $minutes = intval($parts[1]);
            $seconds = intval($parts[2]);
            return $hours . 'h ' . $minutes . 'm ' . $seconds . 's';
        }
    }
    
    return $interval;
}

// Helper function to get ordinal suffix for numbers
function getOrdinal($number) {
    if (!is_numeric($number)) return $number;
    
    $suffix = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
    
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
        return $number . 'th';
    } else {
        return $number . $suffix[$number % 10];
    }
}
?>

<?php require_once APPROOT . "/inc/footer.php"; ?>