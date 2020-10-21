############################################
# Production Server
############################################

set :stage, :production
set :stage_domain, "chris-s-bryant.com"
server "chris-s-bryant.com", user: "deploy", roles: %w(web app db)
set :deploy_to, "/var/www/html"
set :shared_directory, "/var/www/html/shared"
set :current_directory, "/var/www/html/current"

############################################
# Setup Git
############################################

# Set the deploy branch to the current branch
set :branch, 'master'
