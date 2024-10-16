/api/results.php?ref=?
Returns the results for the specified race, e.g., /api/results/1106
Don’t provide the foreign keys for the race, driver, and constructor; instead provide the following fields: driver
(driverRef, code, forename, surname), race (name, round, year, date), constructor (name, constructorRef, nationality).
Sort by the field grid in ascending order (1st place first, 2nd place second, etc).
/api/results.php?driver=?
Returns all the results for a given driver, e.g., /api/results/driver/max_verstappen