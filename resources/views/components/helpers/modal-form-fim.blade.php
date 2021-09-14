              </div>
            </div>                      
        </div>
        <!-- footer -->
        <div class="modal--form-footer">
        <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded 
        text-white focus:outline-none" type="submit">{{ $saveLabel ?? 'Salvar' }}</button>

          </form>
          <!-- onclick="openModal(false)" -->
          <button 
              @click="isOpen = false"
              wire:click="setFormClose()"
              class="delete--button"
          >Close</button>
        </div>
    </div>
  </div>
</div>